<template>
    <div>
        <button
            class="flex items-center justify-center rounded-md bg-slate-900 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-blue-300"
            v-on:click.prevent="addToCart"
            >
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            Add to cart
        </button>
    </div>
</template>

<script setup>
import axios from 'axios';

    const productId = defineProps(['productId']);

    /**
     * axios.get('/sanctum/csrf-cookie') : requête qui initialise la protection contre les attaques CSRF
     * dans une Single Page Application (SPA) utilisant Laravel Sanctum pour
     * l'authentification via cookies c'est à dire Laravel renvoie le CSRF Token 'XSRF-TOKEN'
     * au navigateur qu'il le stockera ensuite Axios (ou tout autre client HTTP configuré correctement)
     * lit ce cookie et ajoute sa valeur dans un header HTTP spécial nommé X-XSRF-TOKEN pour chaque
     * requête POST/PUT/DELETE.
     *
     * On fait ça car nous sommes dans un SPA, ou il n'y pas de possibilités d'utiliser (@csrf) comme
     * dans un fichier blade pour faires des requêtes sécurisées
     *
     * await : mot-clé qui attend qu'une promesse (Promise) soit résolue avant de continuer l'exécution du code
     */
    const addToCart = async() => {
        await axios.get('/sanctum/csrf-cookie');
        await axios.get('/api/user')  // récupère les info de l'utilisateur actuellement connecté
        .then(async(res) => {
            console.log(res);
        })
        .catch(err => console.log(err));
    }
</script>
