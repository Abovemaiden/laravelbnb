import VueRouter from 'vue-router';
import Bookables from './bookables/Bookables.vue';
import Bookable from './bookable/Bookable.vue';
import Review from './review/Review.vue';

const routes = [
  {
    path: '/',
    component: Bookables,
    name: 'home',
  },
  {
    path: '/bookables/:id',
    component: Bookable,
    name: 'bookable',
  },
  {
    path: '/reviews/:id',
    component: Review,
    name: 'review',
  },
];

const router = new VueRouter({
  routes,
  mode: 'history',
});

export default router;
