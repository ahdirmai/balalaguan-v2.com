<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $event = Event::findOrFail(1);
        $data = [
            'event' => $event,
        ];
        return view('admin.event.index', $data);
    }

    public function update(Request $request)
    {
        $event = Event::findOrFail(1);
        $data = $request->validate([
            'name' => 'string|required',
            'start' => 'date|nullable',
            'end' => 'date|nullable',
            'description' => 'string',
            'payment_name' => 'string',
            'payment_account' => 'string',
            'contact_name' => 'string',
            'contact_number' => 'string',
            'logo' => 'image|max:5012|nullable'
        ]);

        if ($event->update($data)){
            flash()->addSuccess('Berhasil memperbarui event!');
        } else {
            flash()->addError('Gagal memperbarui event!');
        }
        
        if ($request->hasFile('logo') && $request->file('logo')->isValid())
            $event->addMediaFromRequest('logo')->toMediaCollection('logo');
            
        return redirect()->route('admin.event.index');
    }
}
