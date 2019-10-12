
import adminindex from '@/admin_components/index';
import adminedit from '@/admin_components/admin/edit';

export default [
  {
      path: '/admin',
      name: 'index',
      component: adminindex
  },
  {
      path: '/admin/edit/:id',
      name: 'edit',
      component: adminedit,
      props:true
  },
];