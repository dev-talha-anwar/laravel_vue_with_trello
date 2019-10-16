import timeline from '@/admin_components/timeline';
import boards from '@/admin_components/boards/boards';

export default[
  	{ 
	    path: "/admin/boards",
	    name: "boards", 
	    component: boards, 
  	}
  	,{ 
	    path: "/admin/timeline",
	    name: "timeline", 
	    component: timeline, 
  	}
];