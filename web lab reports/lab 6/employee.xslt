 <?xml version="1.0"?>
<xsl:stylesheet type="text/xsl" href="employee.xml" version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
  <html>
    <body>
      <h2>Employee Details</h2>
      <table border="1">
        <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Designation</th>
          <th>Salary</th>
        </tr>
        <tr>
          <td><xsl:value-of select="employee/firstname"/></td>
          <td><xsl:value-of select="employee/lastname"/></td>
          <td><xsl:value-of select="employee/designation"/></td>
          <td><xsl:value-of select="employee/salary"/></td>
        </tr>
      </table>
    </body>
  </html>
</xsl:template>
</xsl:stylesheet>
