<?xml version="1.0" encoding="UTF-8" ?>

<xsl:stylesheet version="1.0"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:output encoding="UTF-8" indent="yes" method="html" />

    <xsl:template match="/">
    	<table id="finalTable" border="1">
    		<tr class="header">
    			<th>Place</th>
    			<th>Contestant</th>
    			<th>Species</th>
    			<th>Weight</th>
    			<th>Prize</th>
    			<th style="display:none;">Phone</th>
    			<th style="display:none;">Ticket</th>
    			<th><input type="button" value="Show 1st" onclick="ShowFirst()"/></th>
    		</tr>
    		<xsl:for-each select="data-set/record">
    			<tr>
					<td class="place"><xsl:value-of select="place"/></td>
					<td class="contestant"><xsl:value-of select="contestant"/></td>
					<td class="species"><xsl:value-of select="species"/></td>
					<td class="weight"><xsl:value-of select="weight"/></td>
					<td class="prize"><xsl:value-of select="prize"/></td>
					<td class="phone" style="display:none;"><xsl:value-of select="phone"/></td>
					<td class="ticket" style="display:none;"><xsl:value-of select="ticket"/></td>
					<td class="sms"><input type="button" value="Send SMS" onclick="SendSMS(this)"/></td>
				</tr>
    		</xsl:for-each>
    	</table>
    </xsl:template>
</xsl:stylesheet>