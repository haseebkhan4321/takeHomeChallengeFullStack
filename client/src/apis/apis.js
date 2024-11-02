import Api from "../utils/api";

export const fetchPosts = async (filters) => {
  try {
    return await Api.get("/articles", { ...filters, limit: 10 });
  } catch (error) {
    console.error("Error fetching posts:", error);
  }
};
export const fetchCategories = async () => {
  try {
    return await Api.get("/categories");
  } catch (error) {
    console.error("Error fetching posts:", error);
  }
};
export const fetchSources = async () => {
  try {
    return await Api.get("/sources");
  } catch (error) {
    console.error("Error fetching posts:", error);
  }
};

export const fetchAuthors = async () => {
  try {
    return await Api.get("/authors");
  } catch (error) {
    console.error("Error fetching posts:", error);
  }
};
