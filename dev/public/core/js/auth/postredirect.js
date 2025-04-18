/**
 * Redirige mediante un formulario POST.
 *
 * @param {string} url - The url of the redirect
 * @param {Object} [parameters={}] - The POST parameters
 * @param {boolean} [inNewTab=true] - In a new browser TAB.
 * @returns {void}
 */
export default function PostRedirect(url, parameters = {}, inNewTab = true) {
  //
  // Validate the url
  if (!url || typeof url !== "string") {
    throw new Error("Post Redirect Url Required !");
  }

  //
  // Create the form
  const form = document.createElement("form");
  form.id = "redirect-form";
  form.name = "redirect-form";
  form.action = url;
  form.method = "post";
  form.enctype = "multipart/form-data";

  //
  // In a new browser tab
  if (inNewTab) {
    form.target = "_blank";
  }

  //
  // Create the hidden input elements
  for (const [key, value] of Object.entries(parameters)) {
    const input = document.createElement("input");
    input.type = "hidden";
    input.name = key;
    input.value = value !== null && value !== undefined ? value : "";
    form.appendChild(input);
  }

  //
  // Insert the form in the DOM and submit, then remove
  document.body.appendChild(form);
  form.submit();
  document.body.removeChild(form);
}
