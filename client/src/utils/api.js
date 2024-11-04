const Api = {
  async get(endpoint, body = {}, headers = {}) {
    return await request(
      `${process.env.REACT_APP_APP_URL}${endpoint}${
        Object.keys(body).length > 0 ? "?" + new URLSearchParams(body).toString() : ""
      }`,
      { method: "GET", headers }
    );
  },

  async post(endpoint, body = {}, headers = {}) {
    return await request(`${process.env.REACT_APP_APP_URL}${endpoint}`, { method: "POST", body, headers });
  },

  async put(endpoint, body = {}, headers = {}) {
    return await request(`${process.env.REACT_APP_APP_URL}${endpoint}`, { method: "PUT", body, headers });
  },

  async delete(endpoint, headers = {}) {
    return await request(`${process.env.REACT_APP_APP_URL}${endpoint}`, { method: "DELETE", headers });
  },
};
function getToken() {
  return localStorage.getItem("token") || "";
}

function redirectToLogin() {
  window.location.href = "/login";
}

async function request(url, options) {
  try {
    const token = getToken();

    const response = await fetch(url, {
      method: options.method,
      headers: {
        "Content-Type": "application/json",
        Authorization: `Bearer ${token}`,
        ...options.headers,
      },
      body: options.body ? JSON.stringify(options.body) : null,
    });

    if (response.status === 401 && url !== process.env.REACT_APP_APP_URL + "/login") {
      redirectToLogin();
      return;
    }

    if (!response.ok) {
      throw new Error(`HTTP error! Status: ${response.status}`);
    }

    return await response.json();
  } catch (error) {
    console.error(`Fetch error [${options.method}]:`, error);
    throw error;
  }
}
export default Api;
