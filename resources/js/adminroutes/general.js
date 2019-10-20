import generaledit from '@/admin_components/general/edit';
import PageNotFound from '@/admin_components/PageNotFound';

export default [{
        path: '/admin/general/index',
        name: 'edit/general',
        component: generaledit,
    },
    {
        path: "/admin/*",
        name: "404",
        component: PageNotFound
    }
];
