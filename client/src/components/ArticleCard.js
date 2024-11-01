import React from "react";

export default function ArticleCard({ post }) {
  return (
    <article key={post.id} className="border border-[#dddfe2] rounded-[10px] p-4 shadow-lg">
      <div>
        <img src="/article-placeholder-image.webp" alt={post.slug} className="h-auto w-full rounded-lg" />
      </div>

      <div className="group relative">
        <h3 className="mt-3 text-lg font-semibold text-gray-900 group-hover:text-gray-600">
          <a href={post.href}>
            <span className="absolute inset-0" />
            {post.title.length > 50 ? `${post.title.substring(0, 50)}...` : post.title}
          </a>
        </h3>
        <p className="mt-5 line-clamp-3 text-sm text-gray-600">
          {post.description.length > 200 ? `${post.description.substring(0, 200)}...` : post.description}
        </p>
      </div>

      <div className="relative mt-8 flex items-center gap-x-4">
        {/* Additional styles to align with author info */}
        <div className="text-sm">
          <p className="font-semibold text-gray-900">
            <a href={post.author.href}>
              <span className="absolute inset-0" />
              {post.author.name}
            </a>
          </p>
          <p className="text-gray-600">{post.author.role}</p>
        </div>
      </div>
      <div className="flex items-center gap-x-4 text-xs">
        <span className="text-gray-500">{post.publish_at}</span>
        <a
          href={post.category.href}
          className="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">
          {post.category.title}
        </a>
      </div>
    </article>
  );
}
