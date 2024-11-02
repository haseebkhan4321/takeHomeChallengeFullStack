import React, { useEffect, useState } from "react";
import { useParams } from "react-router-dom";
import { fetchPost } from "../apis/apis";
import Carousel from "../components/Carasoule";

export default function ArticlePage() {
  const { slug } = useParams();
  const [post, setPost] = useState(null);
  useEffect(() => {
    fetchPost(slug)
      .then((data) => setPost(data))
      .catch((error) => console.error(error));
  }, []);

  return (
    <>
      {post && (
        <div class="mx-10 px-5 mt-10">
          <h1 className="text-neutral text-xl font-bold font-serif">{post.title}</h1>
          <h2>Published At: {post.publish_at}</h2>
          <div className="py-5">
            <Carousel
              slides={post.media.map((med, index) => ({ id: med.id, imageUrl: med.path, alt: post.slug + index }))}
            />
          </div>

          <div className="flex flex-row">
            <div className="mr-2 bg-gray-500 rounded px-2 text-white">{"Category: " + post.category.name}</div>
            <div className="mr-2 bg-gray-500 rounded px-2 text-white">{"Source: " + post.source.name}</div>
            <div className="mr-2 bg-gray-500 rounded px-2 text-white">{"Author: " + post.author.name}</div>
            <div className="mr-2 bg-gray-500 rounded px-2 text-white">{"Author: " + post.author.name}</div>
          </div>
          <div>
            <h1 className="text-lg font-bold">Description</h1>
            <p>{post.description}</p>
          </div>
        </div>
      )}
    </>
  );
}
