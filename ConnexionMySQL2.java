import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

Connection conn = null;
String url = "jdbc:mysql://localhost:3306/test";
String user = "neque";
String password = "123";

public void main() {
    try {
        conn = DriverManager.getConnection(url, user, password);
        // La conexión se ha establecido correctamente
    } catch (SQLException e) {
        // Manejo de excepciones en caso de error de conexión
        e.printStackTrace();
    }

//-----------------------------------------------------------------------------------------

// Ejemplo de consulta SQL
    String sql = "SELECT * FROM tabla";

    try {
        PreparedStatement statement = conn.prepareStatement(sql);
        // Ejecutar la consulta y manejar el resultado
    } catch (SQLException e) {
        // Manejo de excepciones en caso de error de consulta
        e.printStackTrace();
    }

//-----------------------------------------------------------------------------------------

    try {
        if (conn != null) {
            conn.close();
        }
    } catch (SQLException e) {
        // Manejo de excepciones en caso de error al cerrar la conexión
        e.printStackTrace();
    }
}