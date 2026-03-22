// Exercise 9-5: AJAX demo script (provided)
//
// This script calls the /api/time endpoint and displays the returned JSON.

async function loadTime() {
    const el = document.getElementById('result');
    if (!el) {
        return;
    }

    el.textContent = 'Loading...';

    try {
        const response = await fetch('/api/time', {
            headers: {
                'Accept': 'application/json',
            },
        });

        const data = await response.json();
        el.textContent = JSON.stringify(data, null, 2);
    } catch (err) {
        el.textContent = String(err);
    }
}

document.addEventListener('DOMContentLoaded', () => {
    loadTime();

    const btn = document.getElementById('reload');
    if (btn) {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            loadTime();
        });
    }
});
