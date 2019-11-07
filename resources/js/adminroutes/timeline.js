import timeline from '@/admin_components/timeline/timeline';
import boards from '@/admin_components/boards/boards';

export default[
  	{ 
	    path: "/admin/boards",
	    name: "boards", 
	    component: boards, 
	    props:true,
  	}
  	,{ 
	    path: "/admin/timeline/:id",
	    name: "timeline", 
	    component: timeline, 
	   	props:true
  	}
];