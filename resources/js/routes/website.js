import index from '@/components/index';
import signup from '@/components/signup';
import signin from '@/components/signin';
import page1 from '@/components/pages/page1';
import PageNotFound from '@/components/PageNotFound';
export default [
  {
    path: '/',
    name: 'index',
    component: index,
    meta: {
      'requiresauth' : null
    }
  },
  {
    path: '/signup',
    name: 'signup',
    component: signup,
    meta: {
      'requiresauth' : false
    }

  },
  {
    path: '/signin',
    name: 'signin',
    component: signin,
    meta: {
      'requiresauth' : false
    }

  },
  {
    path: '/page1',
    name: 'page1',
    component: page1,
    meta: {
      'requiresauth' : true
    }
  },
  { 
    path: "*",
    name: "404", 
    component: PageNotFound,
    meta: {
      'requiresauth' : null
    }

  }
];