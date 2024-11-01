import { Switch } from "@headlessui/react";
import Blogs from "./components/Blogs";
import Navbar from "./components/Navbar";
import { BrowserRouter, Route, Routes } from "react-router-dom";
import Login from "./pages/login";
import HomePage from "./pages/HomePage";
import Signup from "./pages/signup";
import Profile from "./pages/profile";
import PageNotFound from "./pages/PageNotFound";

function App() {
  return (
    <div className="App">
      <BrowserRouter>
        <Navbar />
        <Routes>
          <Route path="/" element={<HomePage />}></Route>
          <Route path="/login" element={<Login />}></Route>
          <Route path="/signup" element={<Signup />}></Route>
          <Route path="/profile" element={<Profile />}></Route>
          <Route path="/*" element={<PageNotFound />}></Route>
        </Routes>
      </BrowserRouter>
    </div>
  );
}

export default App;
