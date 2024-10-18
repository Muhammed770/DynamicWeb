import './bootstrap';
import ClipboardJS from 'clipboard';

import.meta.globe([
    '../images/**'
])

new ClipboardJS('.copy-to-clipboard');

// Optional: Add success and error event listeners
var clipboard = new ClipboardJS('.copy-to-clipboard');

clipboard.on('success', function(e) {
    console.log('Text copied:', e.text);
    e.clearSelection(); // Optionally deselect the text
});

clipboard.on('error', function(e) {
    console.error('Failed to copy:', e);
});
