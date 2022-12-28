const reditectToCustomerRegistration = () => {
  createAppDatabase();
  window.open('./../client/src/pages/customers-registration/customers-registration.html', '_self');
}

const createAppDatabase = () => {
  try {
    fetch(serverPaths.dbResource, {
      method: "POST"
    })
  } catch (error) {
    console.log("Error has ocurred: ", error);
  }
}

reditectToCustomerRegistration();