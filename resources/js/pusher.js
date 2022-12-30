'use strict'

import Pusher from 'pusher-js'
import Swal from 'sweetalert2'

import 'sweetalert2/src/sweetalert2.scss'

const pusher = new Pusher(import.meta.env.VITE_PUSHER_APP_KEY,{
    cluster: 'ap1'
})

const channel = pusher.subscribe('bumantara-electronic-ticket')

channel.bind('scanned', data => {
    const results = JSON.parse(data?.message)
    if ( results.status ) {
        Swal.fire({
            title: 'Hasil Scan QR',
            text: results?.message,
            icon: 'success',
        })
    } else {
        Swal.fire({
            title: 'Hasil Scan QR',
            text: results?.message,
            icon: 'error',
        })
    }

})