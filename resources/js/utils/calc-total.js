export function calcTotal(rowIndex) {
  if (!document.querySelector('td input[data-total]')) return;

  const dataRows = document.querySelectorAll(`td input[data-row="${rowIndex}"]`);

  let total = 0.;
  dataRows.forEach(data => total += parseFloat(data.value));

  const totalCell = document.querySelector(`td[data-total="${rowIndex}"]`);
  totalCell.innerText = total.toFixed(2);
}
