const routes = [];
import admin from '@/adminroutes/admin';
import general from '@/adminroutes/general';
import timeline from '@/adminroutes/timeline';

export default routes.concat(admin,general,timeline);

