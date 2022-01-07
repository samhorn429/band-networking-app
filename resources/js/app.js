require('./bootstrap');

import React from 'react';
import { render } from 'react-dom';
import { InertiaApp } from '@inertiajs/inertia-react';
import { InertiaProgress } from '@inertiajs/progress';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

// createInertiaApp({
//     title: (title) => `${title} - ${appName}`,
//     resolve: (name) => require(`./Pages/${name}`),
//     setup({ el, App, props }) {
        
//         return render(<App {...props} />, el);
//     },
// });

InertiaProgress.init({ color: '#4B5563' });
const app = document.getElementById('app');
render(
    <InertiaApp
        initialPage={JSON.parse(app.dataset.page)}
        resolveComponent={name =>
            import(`./Pages/${name}`).then(module => module.default)
        }
    />,
    app
);
