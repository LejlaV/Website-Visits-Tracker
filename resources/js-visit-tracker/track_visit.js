// const value = document.querySelector('.value');
// const button = document.querySelector('.reset');
// const ipaddress = document.querySelector('.ip_address');

// button.addEventListener('click',function(e){
//     localStorage.setItem('myNumber', 0);
//     value.textContent = 0;
// })

function increaseVisit() {

    let hostname = window.location.hostname;

    this.getIP().then(
        ip => {
            this.increase(hostname, ip);
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

    function increase(hostname, ip){
        fetch('http://127.0.0.1:8000/websites', {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
    },
    body: JSON.stringify({ "hostname": hostname,  "ip": ip})
})
   .then(response => response.json())
   .then(response => console.log(JSON.stringify(response)))
    }
