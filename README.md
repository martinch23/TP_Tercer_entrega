Integrantes:- Salvador, Guido Gabriel. email: guidsalv@gmail.com  (aclaración: dejo la cursada, por lo tanto la tercer entrega fue realizada por el integrante restante)
            - Christensen, Martín. email: martin.christensen93@gmail.com

Temática del TPE: Página de Series

*Listar todos las series:
GET : series
 GET api/series

Al listar todas, se puede especificar que la lista esté ordenada según un campo:
-- GET : series?order_by={String}
Se puede especificar además si el orden es ASCendente o DESCendente
-- GET : series?order_by={String}&ASC
-- GET : series?order_by={String}&DESC

*Listar una serie por su ID:
GET : series/:id
GET api/series/12

Ejemplo: Se puede obtener una serie específica a partir del ID de la misma, como se ve en el Endpoint se obtiene la serie con ID=12.

*Agregar una serie:
POST : series
POST api/series

Este endpoint recibe un objeto JSON en el body del HTTP Request del siguiente formato:
Campos requeridos para efectuar POST:
 { "título" : varchar, (ejemplo: Los Simpsons)
"género" : varchar,    (ejemplo: Animada)
"director": varchar    (ejemplo:Matt Groening)
}

*Modificar un juego:
PUT : juegos/:id
PUT api/series/12

Este endpoint recibe un objeto igual al anterior en el body y modifica el elemento con el ID dado en la base de datos, en este ejemplo el ID=12.
Campos requeridos para efectuar PUT: 
{ "título" : varchar, (ejemplo: cambio de nombre de "Los Simpsons" a "The Simpsons")
"género" : varchar,   (ejemplo: cambio de género de "Animada" a "Acción")
"director":varchar    (ejemplo: cambio de director de "Matt Groening" a "Jon Doe")
}




