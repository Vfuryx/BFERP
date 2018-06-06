import Vue from 'vue';

import VueRouter from 'vue-router';
Vue.use(VueRouter);

/* Layout */
import Layout from '../views/layout/Layout.vue';

const constantRouterMap = [
    {
        // name: 'login',
        path: '/login',
        component: resolve => void(require(['../views/login/index.vue'], resolve))
    },
    {
        // name: '404',
        path: '/404',
        component: resolve => void(require(['../views/404.vue'], resolve))
    },
    {
        // name: 'layout',
        path: '/',
        component: Layout,
        redirect: '/dashboard',
        hidden: true,
        children:[
            {
                path: 'dashboard',
                component: resolve => void(require(['../views/dashboard/index.vue'], resolve))
            }
        ]
    },
    {
        name: 'Example',
        path: '/example',
        component: Layout,
        redirect: '/example/table',
        meta: { title: '例子', icon: 'example' },
        children: [
            {
                path: 'table',
                name: 'Table',
                component: resolve => void(require(['../views/table/index.vue'],resolve)),
                meta: { title: 'Table', icon: 'table' }
            },
            {
                path: 'tree',
                name: 'Tree',
                component: resolve => void(require(['../views/tree/index.vue'],resolve)),
                meta: { title: 'Tree', icon: 'tree' }
            }
        ]
    },

    {
        path: '/form',
        component: Layout,
        children: [
            {
                path: 'index',
                name: 'Form',
                component: resolve => void(require(['../views/form/index.vue'],resolve)),
                meta: { title: '表单', icon: 'form' }
            }
        ]
    },

    {
        path: '/hello',
        component: Layout,
        children: [
            {
                path:'index',
                name: 'Hello',
                component: resolve => void(require(['../components/Hello.vue'], resolve)),
                meta: { title: 'Hello', icon: 'hello'}
            }
        ]

    },
    {
        path: '*',
        redirect:'/404',
        hidden: true
    }
];

export default new VueRouter({
    // saveScrollPosition: true,
    scrollBehavior: () => ({ y: 0 }),
    routes: constantRouterMap
});

