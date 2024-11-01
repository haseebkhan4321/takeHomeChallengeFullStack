import React from "react";
import Blogs from "../components/Blogs";

export default function HomePage() {
  return (
    <>
      <div class="container mx-auto">
        <h1 className="text-neutral max-sm:text-[3rem] sm:text-[3rem]  md:text-[4rem]  lg:text-[6.9rem] font-bold text-center font-serif">
          News Paper
        </h1>
        <hr />
        <Blogs />
      </div>
    </>
  );
}
