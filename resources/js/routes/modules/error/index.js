export default [
    {
        path: 'error',
        name: 'Error',
        meta: {
            title: 'Something went wrong!',
        },
        component: () => import('@views/Pages/Errors/Index'),
    },
    {
        path: '404',
        name: 'Error404',
        meta: {
            title: 'Page not found!',
        },
        component: () => import('@views/Pages/Errors/404'),
    },
]
