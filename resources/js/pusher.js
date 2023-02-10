'use strict'

import Pusher from 'pusher-js'
import Swal from 'sweetalert2'

import 'sweetalert2/src/sweetalert2.scss'

const pusher = new Pusher(import.meta.env.VITE_PUSHER_APP_KEY,{
    cluster: 'ap1'
})

const channel = pusher.subscribe('bumantara-electronic-ticket')

// Get user id from localStorage
const userId = localStorage.getItem('balalaguan:userId') || null

try {
    channel.bind('scanned', data => {
        const results = JSON.parse(data?.message)

        console.log('Results : ' + results)
    
        if ( userId !== null && userId == results.userId ) {
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
        }
    })
} catch(err) { console.error(err) }