Database schema, screenrecording and the demonstration of how the application is working is in the video down below.

https://vimeo.com/819081149?share=copy

DESCRIPTION:

Database schema is a simple database which consists of two tables. Websites and visits, they are connected with one to many relationship. In the table website we’re storing id, hostname and timestamps fields (created_at, updated_at). In visits table we’re storing id, website_id, ip address and timestamps fields (created_at, updated_at) as well.

The application is created using PHP programming language and Laravel framework. The backend layer is consisting of WebsiteController and two main endpoints GET and POST.
With the GET request we’re returning the view which displays a table that represents the data, list of websites we’re monitoring and the number of visits each website has. It is build out with the option of using a date/time filter.
POST method is called each time the website is visited. Using Laravel Request object it is validating hostname and ip fields, creating website and visit object, and storing it to database.

On frontend, in the visit.blade.php file, we have javascript section where we’re picking up the hostname and port of the “visitor”, and we're sending those parameters to the backend (to POST method).
