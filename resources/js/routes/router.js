import { createRouter, createWebHistory } from "vue-router";
import Auth from "../auth/Auth";
import LoginView from '../views/LoginView.vue';
import DashboardView from '../views/DashboardView.vue';
import CategoryView from '../views/CategoryView.vue';
import AddCategoryView from '../views/AddCategoryView.vue';
import EditCategoryView from '../views/EditCategoryView.vue';
import ItemView from '../views/items/ItemView.vue';
import AddItemView from '../views/items/AddItemView.vue';
import EditItemView from '../views/items/EditItemView.vue';
import HomeView from '../views/HomeView.vue';
import ProductDetailView from '../views/ProductDetailView.vue';
import ProudctPageView from '../views/ProductsPageView.vue';


const categoriesRoutes = [
    {
        path: '',
        component: CategoryView,
        name: 'Category',
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/add',
        component: AddCategoryView,
        name: 'AddCategory',
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/details/:id',
        component: EditCategoryView,
        name: 'EditCategory',
        meta: {
            requiresAuth: true
        }
    },
];

const itemRoutes = [
    {
        path: '',
        component: ItemView,
        name: 'Items',
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/add',
        component: AddItemView,
        name: 'AddItems',
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/details/:id',
        component: EditItemView,
        name: 'EditItems',
        meta: {
            requiresAuth: true
        }
    }
];

const clientRoutes = [
    {
        path: '',
        component: HomeView,
        name: 'Home'
    },
    {
        path: '/product/detail/:id',
        component: ProductDetailView,
        name: 'ProductDetails'
    },
    {
        path: '/products/:category',
        component: ProudctPageView,
        name: 'ProductPage'
    }
]
const routes = [
    {
        path: '/',
        redirect: '/dashboard',
    },
    {
        path: '/dashboard',
        component: DashboardView,
        name: "Dashboard",
        meta: {
            requiresAuth: true
        }
    },
    ...prefixRoutes('/category', categoriesRoutes),
    ...prefixRoutes('/item',itemRoutes),
    ...prefixRoutes('/client',clientRoutes),
    {
        path: '/login',
        component: LoginView,
        name: "Login"
    },


];

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes,
});

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (Auth.check()) {
            next();
            return;
        }
        else {
            router.push('/login');
        }
    }
    else {
        next();
    }
});

function prefixRoutes(prefix, routes) {
    return routes.map(route => {
        route.path =  prefix + '' + route.path;
        return route;
    });
}

export default router;
