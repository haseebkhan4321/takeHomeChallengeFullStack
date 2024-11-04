import React from "react";

export default function ArticleCard({ post }) {
  return (
    <article key={post.id} className="border border-[#dddfe2] rounded-[10px]  shadow-lg">
      <div>
        <img
          onError={(e) => {
            e.target.src = "/article-placeholder-image.webp";
          }}
          src={post.media.at(0).path}
          alt={post.slug}
          className="h-auto w-full rounded-t-lg"
        />
      </div>
      <div className="m-2 p-2">
        <span className="rounded bg-gray-50 p-1 text-gray-600 hover:bg-gray-100">{post.category.name}</span>
        <a href={`/articles/${post.slug}`}>
          <h3 className="text-md font-semibold text-gray-900 ">
            {post.title.length > 50 ? `${post.title.substring(0, 50)}...` : post.title}
          </h3>
        </a>

        <p className="mt-2 line-clamp-3 text-sm text-gray-600">
          {post.description.length > 200 ? `${post.description.substring(0, 200)}...` : post.description}
        </p>

        <div className="mt-2 flex items-center gap-x-4">
          {/* Additional styles to align with author info */}
          <div className="text-sm">
            <p className="font-semibold text-gray-900">
              <span>{post.author.name}</span>
            </p>
          </div>
        </div>
        <div className="flex flex-row justify-between">
          <p className="text-gray-600">{post.source.name}</p>
          <span className="text-gray-500">{post.publish_at}</span>
        </div>
      </div>
    </article>
  );
}
