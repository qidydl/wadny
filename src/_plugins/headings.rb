# frozen_string_literal: true

require "nokogiri"

Jekyll::Hooks.register [:documents, :pages], :post_render do |page|
    doc = Nokogiri::HTML5::Document.parse(page.output)

    doc.css("main h1[id], main h2[id], main h3[id], main h4[id], main h5[id], main h6[id]").each do |heading|
        if heading.key?("id") then
            id = heading["id"]
            heading.add_child "<a class=\"heading-anchor\" href=\"##{id}\" aria-labelledby=\"#{id}\">🔗</a>"
        end
    end

    doc.css("a[rel~=\"external\"]").each do |link|
        if link.key?("href") then
            link["target"] = "_blank"
            link["rel"] = link["rel"] + " noopener"

            title = "Opens in a new window"
            if link.key?("title") then
                title = title + " - " + link["title"]
            end
            link["title"] = title
        end
    end

    page.output = doc.to_html
end