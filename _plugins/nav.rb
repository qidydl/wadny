module Jekyll
    class NavigationEntry
        attr_accessor :title, :description, :url, :active, :children, :sortChildren

        def initialize(title, url)
            @title = title
            @description = ""
            @url = url
            @active = false
            @children = {}
            @sortChildren = true
        end
    end

    class NavigationTag < Liquid::Tag
        def initialize(tag_name, text, tokens)
            super
            @text = text
        end

        def renderLevel(entry, path)
            target = path.shift

            # Continue as long as there's work to do:
            # - the path we're following, or
            # - immediate children to display
            if target || entry.children.length > 0 then
                ret = "\n<ul#{entry.url == "/" ? " id=\"mainmenu\"" : ""}>\n"

                # sortChildren is on by default, but we disable it for in-page navigation.
                # We're relying on the URL segment being similar enough to the page title that it can substitute for sorting
                keys = entry.children.keys
                if entry.sortChildren then
                    keys = keys.sort
                end

                keys.each do |child|
                    childEntry = entry.children[child]

                    ret << "<li><a href=\"#{childEntry.url}\""
                    if childEntry.description.length > 0 then
                        ret << " title=\"" + childEntry.description + "\""
                    end
                    if childEntry.active then
                        ret << " class=\"currentpage\""
                    end
                    if childEntry.title == nil then
                        puts childEntry.inspect
                    end
                    ret << ">" + childEntry.title + "</a>"

                    # Recurse if we're following the path and there's more to do
                    # We won't recurse if we're rendering immediate children because we've run out of path at that point and target is nil
                    if child == target then
                        ret << renderLevel(childEntry, path)
                    end

                    ret << "</li>\n"
                end

                ret << "</ul>\n"

                ret
            else
                # Recursion base case
                ""
            end
        end

        def render(context)
            site = context.registers[:site]
            thispage = context.registers[:page]

            root = NavigationEntry.new("root", "/")
            activePath = nil

            site.pages.each do |page|
                parent = root
                entry = nil

                # Break each page up into the hierarchy it belongs in
                if page.url == "/" then
                    # this is the overall root - it might be just a pointer? not sure
                    # overall root doesn't get rendered in nav
                else
                    # Walk the path to reach the page and ensure the hierarchy exists
                    segments = page.url.split('/').select { |seg| seg.length > 0 }
                    segments.each_index do |i|
                        segment = segments[i]

                        # Create entry if it does not exist
                        if !parent.children.has_key?(segment) then
                            parent.children[segment] = NavigationEntry.new(segment, segment)
                        end
                        entry = parent.children[segment]

                        # If we've reached the last segment, this page defines the entry
                        if (i + 1) == segments.length then
                            if page.data.has_key?("navIsSectionDefault") then
                                # This page is the primary for the whole section
                                parent.title = page.data["navSectionTitle"]
                                parent.url = page.url
                                if page.data.has_key?("navSectionDescription") then
                                    parent.description = page.data["navSectionDescription"]
                                end
                            end

                            entry.title = page.data["title"]
                            entry.url = page.url
                            if page.data.has_key?("navDescription") then
                                entry.description = page.data["navDescription"]
                            end

                            # Generated date-based archive pages from jekyll-archives have no title
                            if entry.title == nil then
                                if page.type == "year" then
                                    entry.title = "Archives for " + page.date.strftime("%Y")
                                elsif page.type == "month" then
                                    entry.title = "Archives for " + page.date.strftime("%B %Y")
                                elsif page.type == "day" then
                                    entry.title = "Archives for " + page.date.strftime("%B %-d, %Y")
                                end
                            end

                            if page.url == thispage["url"] then
                                entry.active = true

                                # We've found the current page, this is the path to walk when rendering
                                activePath = segments
                            end
                        else
                            # We haven't reached the end yet, walk one step
                            parent = entry
                        end
                    end
                end

                # A page can define more navigation within itself, generate one layer of children
                # This can never have further recursion because pages are inherently flat files
                if page.data.has_key?("navWithinPage") then
                    # Don't sort in-page navigation; it will be in order based on the content in the page
                    # We're relying on hash keys staying in order, which might not be safe, it seems to work
                    entry.sortChildren = false

                    page.data["navWithinPage"].each do |link|
                        linkEntry = NavigationEntry.new(link["title"], link["url"])
                        if link.has_key?("description") then
                            linkEntry.description = link["description"]
                        end

                        entry.children[linkEntry.url] = linkEntry
                    end
                end
            end

            if activePath == nil then
                if thispage["url"] == "/" then
                    # Expand the news menu but don't highlight an active page
                    activePath = ["news", "during"]
                else
                    # Our active URL wasn't found anywhere--we're probably on a post, not a page
                    activePath = ["news", "during"]
                    root.children["news"].children["during"].active = true
                end
            end

            renderLevel(root, activePath)
        end
    end
end

Liquid::Template.register_tag('nav', Jekyll::NavigationTag)