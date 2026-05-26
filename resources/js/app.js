import './bootstrap';

/* ORARIO CHE CAMBIA AUTOMATICAMENTE */
let clock = document.getElementById('clock');

function automaticClock(){
    const todayDate = new Date();
    const h = String(todayDate.getHours()).padStart(2,'0');
    const m = String(todayDate.getMinutes()).padStart(2,'0');
    const s = String(todayDate.getSeconds()).padStart(2,'0');
    clock.textContent = h + ':' + m + ':' + s;
}

automaticClock();
setInterval(automaticClock, 1000)
