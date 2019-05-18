require 'rexml/document'
require 'cgi'

module Jekyll
    class OpmlTag < Liquid::Tag
        def initialize(tag_name, text, tokens)
            super
            @text = text.strip
        end

        def render(context)
            site = context.registers[:site]
            thispage = context.registers[:page]

            pagePath = File.join(site.source, thispage["path"])
            filePath = File.join(File.dirname(pagePath), @text)

            render = "<ul>\n"

            File.open(filePath) do |opmlFile|
                opml = REXML::Document.new(opmlFile)
                opml.elements.each("opml/body/outline") do |outline|
                    url = CGI.escapeHTML(outline.attributes["htmlUrl"])
                    title = CGI.escapeHTML(outline.attributes["title"])
                    text = CGI.escapeHTML(outline.attributes["text"])

                    render << "    <li><a href=\"#{url}\" rel=\"external\" title=\"Opens in a new window - #{title}\">#{text}</a></li>\n"
                end
            end

            render << "</ul>\n"

            render
        end
    end
end

Liquid::Template.register_tag('opml', Jekyll::OpmlTag)