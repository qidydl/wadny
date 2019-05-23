module Jekyll
    class NavigationBreadcrumbEntry
        attr_accessor :title, :children

        def initialize(title)
            @title = title
            @children = {}
        end
    end

    class NavigationTitleBreadcrumbTag < Liquid::Tag
        def initialize(tag_name, text, tokens)
            super
            @text = text
        end

        def renderText(entry, activePath)
            ret = ""

            activePath.each do |segment|
                entry = entry.children[segment]

                if ret.length > 0 then
                    ret << " - "
                end
                ret << entry.title
            end

            ret
        end

        def render(context)
            site = context.registers[:site]
            thispage = context.registers[:page]

            root = NavigationBreadcrumbEntry.new("root")
            activePath = nil

            site.pages.each do |page|
                parent = root
                entry = nil

                # Break each page up into the hierarchy it belongs in
                if page.url == "/" then
                    # this is the overall root - it might be just a pointer? not sure
                    # overall root doesn't get rendered in nav
                    root.title = page.data["title"]
                else
                    # Walk the path to reach the page and ensure the hierarchy exists
                    segments = page.url.split('/').select { |seg| seg.length > 0 }
                    segments.each_index do |i|
                        segment = segments[i]

                        # Create entry if it does not exist
                        if !parent.children.has_key?(segment) then
                            parent.children[segment] = NavigationBreadcrumbEntry.new(segment)
                        end
                        entry = parent.children[segment]

                        # If we've reached the last segment, this page defines the entry
                        if (i + 1) == segments.length then
                            if page.data.has_key?("navIsSectionDefault") then
                                # This page is the primary for the whole section
                                parent.title = page.data["navSectionTitle"]
                            end

                            entry.title = page.data["title"]

                            # Generated date-based archive pages from jekyll-archives have no title
                            if entry.title == nil then
                                if page.type == "year" then
                                    entry.title = "Archives for " + page.date.strftime("%Y")
                                elsif page.type == "month" then
                                    entry.title = "Archives for " + page.date.strftime("%B %Y")
                                elsif page.type == "day" then
                                    entry.title = "Archives for " + page.date.strftime("%B %e, %Y")
                                end
                            end

                            if page.url == thispage["url"] then
                                # We've found the current page, this is the path to walk to build the navigation text
                                activePath = segments
                            end
                        else
                            # We haven't reached the end yet, walk one step
                            parent = entry
                        end
                    end
                end
            end

            if activePath then
                renderText(root, activePath)
            else
                root.title
            end
        end
    end
end

Liquid::Template.register_tag('navBreadcrumbTitle', Jekyll::NavigationTitleBreadcrumbTag)