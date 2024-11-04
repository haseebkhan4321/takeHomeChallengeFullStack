import { configureStore, combineReducers } from "@reduxjs/toolkit";
import { persistStore, persistReducer } from "redux-persist";
import storage from "redux-persist/lib/storage";
import authReducer from "./features/auth/authSlice";

// Redux Persist configuration
const persistConfig = {
  key: "root",
  storage,
  whitelist: ["auth"],
};

// Combine reducers and wrap with persistence
const rootReducer = combineReducers({
  auth: authReducer,
});

const persistedReducer = persistReducer(persistConfig, rootReducer);

// Configure the store
const store = configureStore({
  reducer: persistedReducer,
  middleware: (getDefaultMiddleware) =>
    getDefaultMiddleware({
      serializableCheck: false,
    }),
});

// Create the persistor instance
const persistor = persistStore(store);

export { store, persistor };
