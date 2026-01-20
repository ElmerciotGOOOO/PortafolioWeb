/**
 * Firebase Configuration Loader
 * Loads Firebase config from backend API - credentials are NOT in this file
 * @author Elmer - AI Software Engineer
 */

let firebaseApp = null;
let firebaseDb = null;
let firebaseAuth = null;
let firebaseStorage = null;
let firebaseConfig = null;
let adminEmail = null;
let isInitialized = false;

/**
 * Initialize Firebase by fetching config from secure backend
 */
async function initFirebase() {
    if (isInitialized) return { app: firebaseApp, db: firebaseDb, auth: firebaseAuth, storage: firebaseStorage };

    try {
        // Fetch config from Laravel backend (credentials stored in .env)
        const response = await fetch('/api/firebase-config');
        if (!response.ok) throw new Error('Failed to load Firebase config');

        const config = await response.json();
        adminEmail = config.adminEmail;

        // Build Firebase config object
        const fbConfig = {
            apiKey: config.apiKey,
            authDomain: config.authDomain,
            databaseURL: config.databaseURL,
            projectId: config.projectId,
            storageBucket: config.storageBucket,
            messagingSenderId: config.messagingSenderId,
            appId: config.appId
        };

        // Initialize Firebase
        firebaseApp = firebase.initializeApp(fbConfig);

        // Initialize services only if they exist
        if (typeof firebase.database === 'function') {
            firebaseDb = firebase.database();
        }
        if (typeof firebase.auth === 'function') {
            firebaseAuth = firebase.auth();
        }
        if (typeof firebase.storage === 'function') {
            firebaseStorage = firebase.storage();
        }

        isInitialized = true;
        console.log('🔥 Firebase initialized successfully');
        return { app: firebaseApp, db: firebaseDb, auth: firebaseAuth, storage: firebaseStorage };
    } catch (error) {
        console.error('❌ Firebase initialization failed:', error);
        throw error;
    }
}

/**
 * Get Realtime Database instance
 */
async function getDatabase() {
    if (!isInitialized) await initFirebase();
    return firebaseDb;
}

/**
 * Get Auth instance
 */
async function getAuth() {
    if (!isInitialized) await initFirebase();
    return firebaseAuth;
}

/**
 * Get Storage instance
 */
async function getStorage() {
    if (!isInitialized) await initFirebase();
    return firebaseStorage;
}

/**
 * Get admin email
 */
async function getAdminEmail() {
    if (!isInitialized) await initFirebase();
    return adminEmail;
}

// Export for module usage if needed
if (typeof module !== 'undefined' && module.exports) {
    module.exports = { initFirebase, getDatabase, getAuth, getStorage, getAdminEmail };
}
