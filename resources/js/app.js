import './bootstrap';
import '../css/app.css';
import * as bootstrap from "bootstrap";

const toastTrigger = document.getElementById('liveToastBtn')
const toastLiveExample = document.getElementById('liveToast')

if (toastTrigger) {
    console.log('do something in js')
    let toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
    // const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
    toastTrigger.addEventListener('click', () => {
        toastBootstrap.show()
    })
}
