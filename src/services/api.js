import axios from "axios";

const api = axios.create({
  baseURL: "http://127.0.0.1:8000/api",
  headers: {
    Accept: "application/json",
    "Content-Type": "application/json",
  },
});

api.interceptors.request.use(
  (config) => {
    const token = localStorage.getItem("token");

    if (token) {
      config.headers.Authorization = `Bearer ${token}`;
    }

    return config;
  },
  (error) => Promise.reject(error)
);

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

export const login = async (email, password) => {
  const response = await api.post("/login", {
    email,
    password,
  });

  if (response.data.token) {
    localStorage.setItem("token", response.data.token);
  }

  if (response.data.user) {
    localStorage.setItem("user", JSON.stringify(response.data.user));
  }

  return response.data;
};

export const register = async (payload) => {
  const response = await api.post("/register", payload);
  return response.data;
};

export const logout = async () => {
  const response = await api.post("/logout");

  localStorage.removeItem("token");
  localStorage.removeItem("user");

  return response.data;
};

export const me = async () => {
  const response = await api.get("/me");
  return response.data;
};

export const getCurrentUser = () => {
  const user = localStorage.getItem("user");

  return user ? JSON.parse(user) : null;
};

export const isLoggedIn = () => {
  return !!localStorage.getItem("token");
};

/*
|--------------------------------------------------------------------------
| PROPERTIES
|--------------------------------------------------------------------------
*/

export const getProperties = async () => {
  const response = await api.get("/properties");
  return response.data;
};

export const getProperty = async (id) => {
  const response = await api.get(`/properties/${id}`);
  return response.data;
};

export const createProperty = async (data) => {
  const response = await api.post("/properties", data);
  return response.data;
};

export const updateProperty = async (id, data) => {
  const response = await api.put(`/properties/${id}`, data);
  return response.data;
};

export const deleteProperty = async (id) => {
  const response = await api.delete(`/properties/${id}`);
  return response.data;
};

export const getMyProperties = async () => {
  const response = await api.get("/agent/properties");
  return response.data;
};

/*
|--------------------------------------------------------------------------
| PROPERTY IMAGES
|--------------------------------------------------------------------------
*/

export const uploadPropertyImage = async (propertyId, file) => {
  const formData = new FormData();

  formData.append("image", file);

  const response = await api.post(
    `/properties/${propertyId}/upload-image`,
    formData,
    {
      headers: {
        "Content-Type": "multipart/form-data",
      },
    }
  );

  return response.data;
};

export const deletePropertyImage = async (imageId) => {
  const response = await api.delete(`/images/${imageId}`);
  return response.data;
};

/*
|--------------------------------------------------------------------------
| BEDROOMS
|--------------------------------------------------------------------------
*/

export const createBedroom = async (propertyId, data) => {
  const response = await api.post(
    `/properties/${propertyId}/bedrooms`,
    data
  );

  return response.data;
};

export const deleteBedroom = async (id) => {
  const response = await api.delete(`/bedrooms/${id}`);
  return response.data;
};

/*
|--------------------------------------------------------------------------
| BATHROOMS
|--------------------------------------------------------------------------
*/

export const createBathroom = async (propertyId, data) => {
  const response = await api.post(
    `/properties/${propertyId}/bathrooms`,
    data
  );

  return response.data;
};

export const deleteBathroom = async (id) => {
  const response = await api.delete(`/bathrooms/${id}`);
  return response.data;
};

/*
|--------------------------------------------------------------------------
| SEARCH & FILTERS
|--------------------------------------------------------------------------
*/

export const searchProperties = async (params = {}) => {
  const response = await api.get("/properties", {
    params,
  });

  return response.data;
};

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

export const getAdminStats = async () => {
  const response = await api.get("/admin/stats");
  return response.data;
};

export const getUsers = async () => {
  const response = await api.get("/admin/users");
  return response.data;
};

export const approveUser = async (id) => {
  const response = await api.post(`/admin/approve-user/${id}`);
  return response.data;
};

/*
|--------------------------------------------------------------------------
| CHAT
|--------------------------------------------------------------------------
*/

export const sendMessage = async (receiverId, message) => {
  const response = await api.post("/chat/send", {
    receiver_id: receiverId,
    message,
  });

  return response.data;
};

export const getMessages = async (userId) => {
  const response = await api.get(`/chat/messages/${userId}`);
  return response.data;
};


  import axios from "axios";

const api = axios.create({
  baseURL: "http://YOUR-LARAVEL-DOMAIN/api",
  headers: {
    Accept: "application/json",
    "Content-Type": "application/json",
  },
});

api.interceptors.request.use((config) => {
  const token = localStorage.getItem("token");

  if (token) {
    config.headers.Authorization = `Bearer ${token}`;
  }

  return config;
});

export default api;

/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/

export const getAgentDashboard = async () => {
  const response = await api.get("/agent/dashboard");
  return response.data;
};

export default api;