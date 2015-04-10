<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE xsl:stylesheet SYSTEM "xhtml11.dtd">
<xsl:stylesheet version="2.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:output
            method="html"
            encoding="utf-8"
            indent="yes"/>

    <xsl:template match="/">
            <xsl:apply-templates select="*"></xsl:apply-templates>
    </xsl:template>

    <xsl:template match="channel">
        <div>
        <xsl:attribute name="class">rss</xsl:attribute>
                <h1>
                    <xsl:value-of select="title"></xsl:value-of>
                </h1>
                <p>
                    <xsl:value-of select="description"></xsl:value-of>
                </p>
                <a>
                    <xsl:attribute name="href">
                        <xsl:value-of select="link"></xsl:value-of>
                    </xsl:attribute>
                    <xsl:value-of select="link"></xsl:value-of>
                </a>
                <p>
                    <xsl:value-of select="copyright"></xsl:value-of>
                </p>
                <p>
                    <xsl:value-of select="pubDate"></xsl:value-of>
                </p>
                <xsl:for-each select="item">
                    <xsl:apply-templates select="."></xsl:apply-templates>
                </xsl:for-each>
        </div>
    </xsl:template>
<xsl:template match="item">
    <div>
        <h2>
            <xsl:value-of select="title"></xsl:value-of>
        </h2>
        <p>
            <xsl:value-of select="description"></xsl:value-of>
        </p>
        <a>
            <xsl:attribute name="href">
                <xsl:value-of select="link"></xsl:value-of>
            </xsl:attribute>
            <xsl:value-of select="link"></xsl:value-of>
        </a>
        <p>
            <xsl:value-of select="pubDate"></xsl:value-of>
        </p>
    </div>
</xsl:template>


</xsl:stylesheet>