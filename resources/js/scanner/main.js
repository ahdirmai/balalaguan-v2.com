'use strict'

import { Html5QrcodeScanner } from 'html5-qrcode'
import axios from 'axios'
import Swal from 'sweetalert2'

import 'sweetalert2/src/sweetalert2.scss'

const role = document.querySelector('#role').value || 'admin'

const showAlert = (text, icon) => {
    Swal.fire({
        title: 'Hasil Scan QR', text, icon,
    })
    .then(res => {
        if (res.value) scanning()
    })
}

const onScanSuccess = async (decodedText, decodedResult) => {
    // Pause
    html5QrcodeScanner.pause()

    // Fetching data
    try {
        const res = await axios.post(`/${ role }/ticket/check-in`, { decoded: decodedText }, {
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })

        if ( res.data?.status ) showAlert(res.data?.message, 'success') 
        else showAlert(res.data?.message, 'error')
    scanning()
    } catch(err) { showAlert(err, 'error') }
}

const onScanFailure = error => console.log(error)

let html5QrcodeScanner = new Html5QrcodeScanner("reader",
    { 
        fps: 10, 
        qrbox: { 
            width: 250,
            height: 250
        }
    }, false)

const scanning = () => html5QrcodeScanner.render(onScanSuccess, onScanFailure)

scanning()