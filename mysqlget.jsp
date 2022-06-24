<%@page import="java.sql.DriverManager"%>
<%@page import="java.sql.ResultSet"%>
<%@page import="java.sql.Statement"%>
<%@page import="java.sql.Connection"%>

<%
String driverName = "com.mysql.jdbc.Driver";
String connectionUrl = "jdbc:mysql://localhost:3306/";
String dbName = "dbVenkatesh";
String userId = "venkatesh";
String password = "pwdvenkatesh";

try {
Class.forName(driverName);
} catch (ClassNotFoundException e) {
e.printStackTrace();
}

Connection connection = null;
Statement statement = null;
ResultSet resultSet = null;
%>


<% try { connection = DriverManager.getConnection( connectionUrl + dbName, userId, password);
 statement = connection.createStatement();
 String sql = "SELECT * FROM item WHERE itemId = '"+ $itemId"'";
 resultSet = statement.executeQuery(sql);




 while (resultSet.next()) 
 {
 	out.print("Item Name: " + resultSet.getString("- description") + "Unit Price: " + resultSet.getString("unitPrice"));
 }
} catch (Exception e) {
out.println(e);
}
%>
