<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Website Visits Tracker</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <style>
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            h1 {
                font-size: 48px;
                color: #333;
                text-align: center;
                text-transform: uppercase;
                font-weight: bold;
                letter-spacing: 2px;
            }
        </style>
    </head>
    <body>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <h1>Thank you for your visit!</h1>
            <!-- <script src="/resources/js/visits-tracker.js"></script> -->
        <script>
            const csrfToken = '{{ csrf_token() }}';
            function increaseVisit() {
                let hostname = window.location.hostname;
                this.getIP().then(
                    ip => {
                        this.increase(hostname, ip.toString());
                    }
                ).catch(err => console.log(err));
            }

            window.addEventListener('load', increaseVisit);
            window.addEventListener('load', getIP);

            function getIP() {
                return new Promise((resolve, reject) => {
                    fetch('https://api.ipify.org')
                    .then((res) => res.text())
                    .then(ip => resolve(ip))
                    .catch(err => reject(err));
                });
            }

            function increase(hostname, ip) {
                fetch('http://127.0.0.1:8000/websites', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken 
            },
                body: JSON.stringify({ "hostname": hostname, "ip": ip})
            })
                .then(response => response.json())
                .then(response => console.log(JSON.stringify(response)))
            }
        </script>
    </body>
</html>
