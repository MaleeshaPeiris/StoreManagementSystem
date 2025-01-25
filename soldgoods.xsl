<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html" indent="yes"/>

    <xsl:template match="/">
        <html>
        <head>
            <title>Item List</title>
            <style>
                /* Style the table and border */
                table {
                    width: 100%;
                    border-collapse: collapse;
                }
                table, th, td {
                    border: 1px solid black;
                }
                th, td {
                    padding: 8px;
                    text-align: left;
                }
                tr {
                    margin-bottom: 10px;
                }
            </style>

            <script>

            </script>
        </head>
        <body>
            <h1>Shopping Catalog</h1>
            <table>
                <tr>
                    <th>Item Number</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity Available</th>
                    <th>Quantity On Hold</th>
                    <th>Quantity Sold</th>
                </tr>
                <!-- Only display items where quantity_available > 0 -->
                <xsl:for-each select="items/item">
                    <xsl:if test="items-sold &gt; 0">
                        <tr>
                            <td><xsl:value-of select="id"/></td>
                            <td><xsl:value-of select="itemname"/></td>
                            <td><xsl:value-of select="itemprice"/></td>
                            <td><xsl:value-of select="itemquantity"/></td>
                            <td><xsl:value-of select="item-quantity-on-hold"/></td>
                            <td><xsl:value-of select="items-sold"/></td>
                        </tr>
                        <xsl:text>&#xa;</xsl:text> 
                    </xsl:if>
                </xsl:for-each>
                <tr>
                    <td>
                        <button type="button" onclick="processGoods()">Process</button>
                    </td>
                </tr>
            </table>
            <xsl:text>&#xa;</xsl:text> 
            <xsl:text>&#xa;</xsl:text>            
        </body>
        </html>
    </xsl:template>
</xsl:stylesheet>

