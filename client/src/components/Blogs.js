import React, { useState, useEffect } from "react";
import ArticleCard from "./ArticleCard";
import { fetchAuthors, fetchCategories, fetchPosts, fetchSources } from "../apis/apis";

export default function Blogs() {
  const [posts, setPosts] = useState([]);
  const [categories, setCategories] = useState([]);
  const [sources, setSources] = useState([]);
  const [authors, setAuthors] = useState([]);
  const [filters, setFilters] = useState({});
  useEffect(() => {
    fetchCategories().then((data) => setCategories(data));
    fetchSources().then((data) => setSources(data));
    fetchAuthors().then((data) => setAuthors(data));
  }, []);

  useEffect(() => {
    fetchPosts(filters).then((data) => setPosts(data));
  }, [filters]);
  return (
    <>
      <div className="flex lg:flex-row max-lg:flex-col justify-center max-lg:w-full mx-auto gap-4 p-4">
        <button
          className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
          onClick={() => setFilters({ ...filters, news_feed: filters.news_feed ? false : true })}>
          News Feed
        </button>
        <select
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          onChange={(e) => setFilters({ ...filters, category: e.target.value })}>
          <option value="" selected>
            Category
          </option>
          {categories.map((category, index) => (
            <option key={index} value={category.slug}>
              {category.name}
            </option>
          ))}
        </select>
        <select
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          onChange={(e) => setFilters({ ...filters, source: e.target.value })}>
          <option value="" selected>
            Source
          </option>
          {sources.map((source, index) => (
            <option key={index} value={source.slug}>
              {source.name}
            </option>
          ))}
        </select>
        <select
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          onChange={(e) => setFilters({ ...filters, author: e.target.value })}>
          <option value="" selected>
            Author
          </option>
          {authors.map((author, index) => (
            <option key={index} value={author.slug}>
              {author.name}
            </option>
          ))}
        </select>
        <div className="flex px-4 py-3 rounded-md border-2 border-blue-500 overflow-hidden  font-[sans-serif]">
          <input
            onChange={(e) => setFilters({ ...filters, search: e.target.value })}
            type="text"
            placeholder="Search Something..."
            className="w-full outline-none bg-transparent text-gray-600 text-sm"
          />
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192.904 192.904" width="16px" className="fill-gray-600">
            <path d="m190.707 180.101-47.078-47.077c11.702-14.072 18.752-32.142 18.752-51.831C162.381 36.423 125.959 0 81.191 0 36.422 0 0 36.423 0 81.193c0 44.767 36.422 81.187 81.191 81.187 19.688 0 37.759-7.049 51.831-18.751l47.079 47.078a7.474 7.474 0 0 0 5.303 2.197 7.498 7.498 0 0 0 5.303-12.803zM15 81.193C15 44.694 44.693 15 81.191 15c36.497 0 66.189 29.694 66.189 66.193 0 36.496-29.692 66.187-66.189 66.187C44.693 147.38 15 117.689 15 81.193z"></path>
          </svg>
        </div>
      </div>
      <div className="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 p-4">
        {posts.map((post, index) => (
          <ArticleCard key={index} post={post} />
        ))}
      </div>
      <div class="fter:h-px my-24 flex items-center before:h-px before:flex-1  before:bg-gray-300 before:content-[''] after:h-px after:flex-1 after:bg-gray-300  after:content-['']">
        <button
          type="button"
          className="flex items-center rounded-full border border-gray-300 bg-secondary-50 px-3 py-2 text-center text-sm font-medium text-gray-900 hover:bg-gray-100">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" className="mr-1 h-4 w-4">
            <path
              fill-rule="evenodd"
              d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
              clip-rule="evenodd"
            />
          </svg>
          View More
        </button>
      </div>
    </>
  );
}
