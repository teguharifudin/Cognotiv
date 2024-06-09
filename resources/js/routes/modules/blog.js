export default [
    {
        path: 'blogs',
        name: 'Blog',
        redirect: { name: 'BlogList' },
        meta: {
            label: 'Blog',
            icon: 'fas fa-projects'
        },
        component: {
            template: '<router-view></router-view>'
        },
        children: [
            {
                path: '',
                name: 'BlogList',
                meta: {
                    label: 'List Blog',
                },
                component: () => import('@views/Pages/Blog/Index'),
            },
            {
                path: 'create',
                name: 'BlogCreate',
                meta: {
                    label: 'Add Blog',
                },
                component: () => import('@views/Pages/Blog/Action'),
            },
            {
                path: ':uuid/edit',
                name: 'BlogEdit',
                meta: {
                    label: 'Edit Blog',
                },
                component: () => import('@views/Pages/Blog/Action'),
            },
            {
                path: ':uuid',
                name: 'BlogShow',
                meta: {
                    label: 'Blog Detail',
                },
                component: () => import('@views/Pages/Blog/Show'),
            }
        ]
    },
]
