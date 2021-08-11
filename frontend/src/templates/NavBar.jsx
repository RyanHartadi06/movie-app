import React from "react";
import { MenuOutlined, SearchOutlined, UserOutlined } from "@ant-design/icons";

const NavBar = () => {
  return (
    <nav className="py-2 px-3 bg-white flex flex-wrap filter drop-shadow-sm sticky top-0">
      <div className="mr-3">
        <button className="w-10 h-10 flex items-center justify-center bg-white hover:bg-gray-100 rounded-md transition delay-75 duration-150 ease-in-out">
          <MenuOutlined />
        </button>
      </div>
      <div className="flex items-center mr-3">
        <h1 className="md:text-2xl sm:text-xl font-semibold">Movie Forum App</h1>
      </div>
      <div className="flex-grow flex justify-end items-center">
        <button className="w-10 h-10 flex items-center justify-center bg-white hover:bg-gray-100 rounded-md text-gray-400 hover:text-red-500 mr-2 transition delay-75 duration-150 ease-in-out">
          <SearchOutlined />
        </button>
        <button className="w-10 h-10 flex items-center justify-center bg-white hover:bg-gray-100 rounded-md text-gray-400 hover:text-red-500 transition delay-75 duration-150 ease-in-out">
          <UserOutlined />
        </button>
      </div>
    </nav>
  );
};

export default NavBar;
