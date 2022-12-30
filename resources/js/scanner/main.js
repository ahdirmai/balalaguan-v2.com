'use strict'

import { Html5QrcodeScanner } from 'html5-qrcode'

const form = document.querySelector('#form')
const decodedField = document.querySelector('[name=decoded]')

const onScanSuccess = (decodedText, decodedResult) => {
    // handle the scanned code as you like, for example:
    console.log(`Code matched = ${decodedText}`, decodedResult)

    // stopping scanning
    html5QrcodeScanner.clear()

    // submit form
    decodedField.setAttribute('value', decodedText)
    form.submit()
    // console.log(decodedText)
}

const onScanFailure = error => {
    // handle scan failure, usually better to ignore and keep scanning.
    // for example:
    // console.warn(`Code scan error = ${error}`)
}

let html5QrcodeScanner = new Html5QrcodeScanner("reader",
    { 
        fps: 10, 
        qrbox: { 
            width: 250,
            height: 250
        }
    }, false)

html5QrcodeScanner.render(onScanSuccess, onScanFailure)