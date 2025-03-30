import './bootstrap';

import Alpine from 'alpinejs';
import Prism from 'prismjs';
import 'flowbite';



Prism.highlightAll();


import 'prismjs/components/prism-javascript';

window.Alpine = Alpine;

Alpine.start();
const userId = document.querySelector('meta[name="user-id"]').getAttribute('content');

if (userId) {
    window.Echo.private(`group.${groupId}`)
        .listen('NewMessage', (e) => {
            Livewire.emit('refreshMessages');
            Livewire.emit('messageReceived');
        });
}
