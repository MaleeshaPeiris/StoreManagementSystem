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
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity </th>
                    <th>Add</th> 
                </tr>
                <!-- Only display items where quantity_available > 0 -->
                <xsl:for-each select="items/item">
                    <xsl:if test="itemquantity &gt; 0">
                        <tr>
                            <td><xsl:value-of select="id"/></td>
                            <td><xsl:value-of select="itemname"/></td>
                            <td><xsl:value-of select="substring(itemdescription, 1, 20)"/>...</td> <!-- First 20 characters -->
                            <td><xsl:value-of select="itemprice"/></td>
                            <td><xsl:value-of select="itemquantity"/></td>
                            <!-- Button in the last column -->
                            <td>
                                <button type="button" onclick="addToCart('{id}')">Add one to Cart</button>
                            </td>
                        </tr>
                        <xsl:text>&#xa;</xsl:text> 
                    </xsl:if>
                </xsl:for-each>
            </table>
            <xsl:text>&#xa;</xsl:text> 

            <xsl:for-each select="items/item">
                <xsl:if test="item-quantity-on-hold &gt; 0">
                    <xsl:variable name="onHoldQuantityAvailability">True</xsl:variable>
                </xsl:if>
            </xsl:for-each>
            <xsl:text>&#xa;</xsl:text> 
            <div id="shoppingcart" style="display: block;">
                <h1>Shopping Cart</h1>
                <table >
                    <tr>
                        <th>Item Number</th>
                        <th>Price</th>
                        <th>Quantity </th>
                        <th>Remove</th> 
                    </tr>



                    <!-- Only display items where quantity_available > 0 -->
                    <xsl:for-each select="items/item">
                        <xsl:if test="item-quantity-on-hold &gt; 0">
                            <tr>
                                <td><xsl:value-of select="id"/></td>
                                <td><xsl:value-of select="itemprice"/></td>
                                <td><xsl:value-of select="item-quantity-on-hold"/></td>
                                <!-- Button in the last column -->
                                <td>
                                    <button type="button" onclick="removeFromCart('{id}')">Remove from Cart</button>
                                </td>
                            </tr>
                            <xsl:text>&#xa;</xsl:text> 

                        </xsl:if>
                    </xsl:for-each>
                    <tr> 
                        <td colspan="2">Total:</td>

                    </tr>
                    <tr>
                        <td>
                            <button type="button" onclick="confirmPurchase()">Confirm Purchase</button>
                        </td>
                        <td>
                            <button type="button" onclick="cancelPurchase()">Cancel Purchase</button>
                        </td>
                    </tr>
                </table>
            </div>
            
        </body>
        </html>
    </xsl:template>
</xsl:stylesheet>

