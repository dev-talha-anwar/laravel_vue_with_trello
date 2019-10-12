import generaledit from '@/admin_components/general/edit';
import PageNotFound from '@/admin_components/PageNotFound';

export default[
	{
	    path: '/admin/general/edit',
	    name: 'edit/general',
	    component: generaledit,
	    props:true
  	},
  	{ 
	    path: "/admin/*",
	    name: "404", 
	    component: PageNotFound,
	    meta: {
      		'requiresauth' : null
    	}
  	}
]
;